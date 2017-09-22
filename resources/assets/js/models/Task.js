class Task {

	static all(then) {
		return axios.get('tasks')
			.then(({data}) => then(data));
	}

}

export default Task;