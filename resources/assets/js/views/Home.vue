<template>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h1>Tasks</h1>
				</div>
			</div>

			<div class="alert alert-info" role="alert" v-show="msgShow" v-text="msg"></div>

			<div class="panel panel-info" v-for="task in tasks">
				<span class="badge" v-if="task.users[0]"><strong>{{ task.users[0].name }}</strong> task is: </span>
				<span class="badge" v-else>Assign this task to someone</span>
				<p>{{ task.body }}</p>
				<button @click="showTask(task.id)" class="btn btn-warning">Edit</button>
				<button @click="deleteTask(task.id)" class="btn btn-danger">Delete</button>
			</div>

		</div>
	</div>
</template>

<script>

	import Task from '../models/Task';

	export default {

		data() {
			return {
				tasks: [],
				msgShow: false,
				msg: ''
			}
		},

		mounted() {

			this.getAll();

		},

		methods: {
			getAll() {
				Task.all(tasks => this.tasks = tasks);
			},

			deleteTask(id) {
				axios.delete('delete/' + id).then((resp) => {
					this.msg = 'The task has been successfuly deleted';
					this.msgShow = true;
					this.getAll();
				});
			},

			showTask(id) {
				axios.get('task/' + id).then((resp) => {
					this.$router.options.routes[0].params.task_id = id;
					this.$router.options.routes[0].params.task_body = resp.data.task.body;
					this.$router.options.routes[0].params.task_user_id = resp.data.user_id[0] ? resp.data.user_id[0].id : '';
					this.$router.options.routes[0].params.edit = true;
					this.$router.push('/tasks');
				});
			}
		}

	}

</script>