import FaqIndex from '@/views/pages/faq/Index.vue';
import FaqCreate from '@/views/pages/faq/partials/Create.vue';
import FaqEdit from '@/views/pages/faq/partials/Edit.vue';

const routes = [
  {
    name: 'faqs',
    path: '/administration/faqs',
    component: FaqIndex,
  },
  {
    name: 'faq-create',
    path: '/administration/faq/create',
    component: FaqCreate,
  },
  {
    name: 'faq-edit',
    path: '/administration/faq/edit/:id',
    component: FaqEdit,
  },

];

export default routes;