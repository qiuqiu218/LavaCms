<?php

namespace App\Models\Admin;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use HasApiTokens, Notifiable, HasRoles;

	protected $guard_name = 'admin';

    /**
     * @var array
     */
    protected $fillable = [
        'username',
        'nickname',
        'phone',
        'email',
        'password'
    ];

    /**
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'email_verified_at'
    ];

    /**
     * @param $username
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|null|object
     */
    public function findForPassport($username)
    {
        return $this->query()->where('username', $username)->first();
    }

    /**
     * @param $value
     */
    public function setPasswordAttribute($value)
    {
        if ($value) {
            $this->attributes['password'] = bcrypt($value);
        }
    }

	/**
	 * auth认证，获取token
	 * @param $username
	 * @param $password
	 * @return array
	 */
    public static function getToken($username, $password)
    {
        $http = new Client();
        $passport = \Laravel\Passport\Client::query()->find(2);
        try {
            $response = $http->post(url('oauth/token'), [
                'form_params' => [
                    'grant_type' => 'password',
                    'client_id' => '2',
                    'client_secret' => $passport->secret,
                    'username' => $username,
                    'password' => $password,
                    'scope' => '',
                    'provider' => 'admins'
                ]
            ]);
            return [
                'status' => 'success',
                'data' => json_decode((string) $response->getBody(), true),
                'code' => $response->getStatusCode(),
                'message' => 'token获取成功'
            ];
        } catch (RequestException $e) {
            return [
                'status' => 'error',
                'code' => $e->getCode(),
                'data' => [],
                'message' => $e->getCode() === 401 ? '账户或密码错误' : '未知错误'
            ];
        }
    }

	/**
	 * 根据用户权限显示响应的菜单
	 * @return mixed
	 * @throws \Exception
	 */
	public function getMenu()
	{
		$collection = collect($this->getAllPermissions())->map(function ($item) {
			return $item->name;
		});
		return Menu::query()->whereIn('name', $collection)->get()->toHierarchy()->values();
    }
}
