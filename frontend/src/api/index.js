// @flow
class API {
	get (url: string) {
		return this.sendRequest('GET', url);
	}

	post (url: string, body: Object) {
		return this.sendRequest('POST', url, body);
	}

	sendRequest = (method: string, url: string, body?: Object) => {
		const headers: { Accept: string, 'Content-Type': string } = {
			Accept: 'application/json',
			'Content-Type': 'application/json; charset=UTF-8'
		};

		const config: { method?: string, headers: Object, body?: Object } = {
			method,
			headers
		};

		if (body) {
			config.body = JSON.stringify(body);
		}

		return fetch(process.env.HOST + url, config)
			.then(response => response.json());
	};
}

export default new API();
