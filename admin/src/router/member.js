import AdminIndex from '@/views/member/admin/index'
import AdminCreate from '@/views/member/admin/create'
import AdminUpdate from '@/views/member/admin/update'

export default [
  {
    path: 'member/admin',
    name: 'member/admin',
    component: AdminIndex
  },
  {
    path: 'member/admin/create',
    name: 'member/admin/create',
    component: AdminCreate
  },
  {
    path: 'member/admin/:id',
    name: 'member/admin/update',
    component: AdminUpdate
  }
]
