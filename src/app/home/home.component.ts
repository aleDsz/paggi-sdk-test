import { Component, OnInit } from '@angular/core';
import { NgForm } from '@angular/forms';
import { ApiService } from '../api.service';

declare var $ : any;

@Component({
	selector: 'app-home',
	templateUrl: './home.component.html',
	styleUrls: ['./home.component.css']
})

export class HomeComponent implements OnInit {
	public model: any;
	public error: string;
	public success: string;
	private cards : any;
	private user : any;

	constructor(private apiService: ApiService) {
		this.clearModel();
		this.user = JSON.parse(localStorage.getItem("token"));
		this.user = this.user.data;
	}

	ngOnInit () {
		this.getCards(+this.user.id);
	}

	clearModel() {
		this.model = {
			id: null,
			user_id: null,
			number: null,
			holder_name: null,
			cvv: null
		};

		this.error = null;
		this.success = null;
	}

	getCards(id: number) {
		this.cards = null;
		var obj = {
			id: id
		};

		this.apiService
			.get("/cards", obj)
			.subscribe(
				(response: any) => {
					response = JSON.parse(response._body);

					if (response.status) {
						this.cards = response.data;
					} else {
						this.cards = null;
					}
				}
			);
	}

	send(form: NgForm) {
		if (form.valid && $("#register_form").form("is valid")) {
			var obj = { ...this.model };
			obj.user_id = this.user.id;

			this.error = null;
			this.success = null;

			if (obj.id != null) {
				this.apiService
					.put("/cards", obj)
					.subscribe(
						(response: any) => {
							response = JSON.parse(response._body);

							if (response.status) {
								this.success = "Cartão salvo com sucesso!";

								setTimeout(() => {
									this.clearModel();
								}, 2000);
							} else {
								this.error = "Houve um erro de comunicação com nosso servidor, por favor tente novamente mais tarde.";
							}
						}
					);
			} else {
				this.apiService
					.post("/cards", obj)
					.subscribe(
						(response: any) => {
							response = JSON.parse(response._body);

							if (response.status) {
								this.success = "Cartão inserido com sucesso!";

								setTimeout(() => {
									this.clearModel();
								}, 2000);
							} else {
								this.error = "Houve um erro de comunicação com nosso servidor, por favor tente novamente mais tarde.";
							}
						}
					);
			}
		}
	}
}