import VueRouter from 'vue-router';

let routes = [

	{
		path: '/',
		component: require('./views/Home'),
		params: {
			task_id: '',
			task_body: '',
			task_user_id: '',
			edit: false
		}
	},
	{
		path: '/tasks',
		component: require('./views/Tasks'),
		props: true
	}

];

export default new VueRouter({
	routes,
	linkActiveClass: 'active'
});