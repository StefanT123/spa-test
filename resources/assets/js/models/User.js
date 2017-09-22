class User {

	static all(then) {
		return axios.get('users')
			.then(({data}) => then(data));
	}

}

export default User;