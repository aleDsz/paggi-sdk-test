import { Injectable } from '@angular/core';
import { environment } from '../environments/environment';
import { Http, Headers, RequestOptions, RequestMethod, URLSearchParams } from '@angular/http';

@Injectable({
	providedIn: 'root'
})
export class ApiService {
	constructor(private http: Http) {

	}

	find(route: string, id: number) {
		const headers = new Headers({
			'Content-Type': 'application/json; charset=utf-8',
		});

		return this.http.get(environment.api_path + route + "/" + id, new RequestOptions({
			method: RequestMethod.Get,
			headers: headers
		}));
	}

	get(route: string, obj: any) {
		const headers = new Headers({
			'Content-Type': 'application/json; charset=utf-8',
		});

		let params = new URLSearchParams();
		let keys = Object.keys(obj);

		for (var i in keys) {
			var key = keys[i];
			params.set(key, obj[key]);
		}

		return this.http.get(environment.api_path + route, new RequestOptions({
			method: RequestMethod.Get,
			headers: headers,
			params: params
		}));
	}

	post(route: string, obj: any) {
		var json = JSON.stringify(obj);
		const headers = new Headers({
			'Content-Type': 'application/json; charset=utf-8',
		});

		return this.http.post(environment.api_path + route, json, new RequestOptions({
			method: RequestMethod.Post,
			headers: headers
		}));
	}

	put(route: string, obj: any) {
		var json = JSON.stringify(obj);
		const headers = new Headers({
			'Content-Type': 'application/json; charset=utf-8',
		});

		return this.http.put(environment.api_path + route + "/" + obj.id, json, new RequestOptions({
			method: RequestMethod.Put,
			headers: headers
		}));
	}

	delete(route: string, id: number) {
		const headers = new Headers({
			'Content-Type': 'application/json; charset=utf-8',
		});

		return this.http.delete(environment.api_path + route + "/" + id, new RequestOptions({
			method: RequestMethod.Delete,
			headers: headers
		}));
	}
}