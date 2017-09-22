<template>

	<div class="col-md-8">
		<div class="panel panel-default">
			<div class="panel-heading">
				Create new task
			</div>
			<div class="panel-body">
				<form @submit.prevent="edit ? updateTask(task.id) : createTask">
					<div class="input-group">
						<input type="text" class="form-control" name="body" placeholder="Enter task" v-model="task.body">
					</div>
					<div class="input-group">
						<select name="task_user_id" v-model="task.user_id">
							<option v-for="user in users" v-bind:value="user.id">{{ user.name }}</option>
						</select>
					</div>

					<div class="input-group">
						<button class="btn-primary" v-show="!edit">New Task</button>
						<button class="btn-warning" v-show="edit">Edit Task</button>
					</div>
				</form>
			</div>
		</div>
	</div>

</template>

<script>

	import User from '../models/User';

	export default {

		data() {
			return {
				users: [],
				task: {
					id: '',
					body: '',
					user_id: ''
				},
				edit: false
			};
		},

		mounted() {
			this.task.id = this.$router.options.routes[0].params.task_id;
			this.task.body = this.$router.options.routes[0].params.task_body;
			this.task.user_id = this.$router.options.routes[0].params.task_user_id;
			this.edit = this.$router.options.routes[0].params.edit;
			User.all(users => this.users = users);
		},

		methods: {
			createTask() {
				axios.post('tasks/create', this.task)
					.then((resp) => {
						console.log(resp);
					});
			},

			updateTask(id) {
				axios.patch('update/' + id, this.task)
					.then((resp) => {
						this.edit = false;
						console.log(resp);
					});
				this.$router.push('/');
			}
		}

	}

</script>