import BandIndex from '@/views/pages/band/Index.vue';
import BandCreate from '@/views/pages/band/partials/Create.vue';
import BandEdit from '@/views/pages/band/partials/Edit.vue';

const routes = [
  {
    name: 'bands',
    path: '/administration/bands',
    component: BandIndex,
  },
  {
    name: 'band-create',
    path: '/administration/band/create',
    component: BandCreate,
  },
  {
    name: 'band-edit',
    path: '/administration/band/edit/:id',
    component: BandEdit,
  },
];

export default routes;