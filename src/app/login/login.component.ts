import { Component, OnInit } from '@angular/core';
import { NgForm } from '@angular/forms';
import { ApiService } from '../api.service';
import { Router } from '@angular/router';
import { Md5 } from 'ts-md5/dist/md5';

declare var $: any;

@Component({
	selector: 'app-login',
	templateUrl: './login.component.html',
	styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {

	public model: any;
	public error: string;
	public success: string;

	constructor(private apiService: ApiService, private router: Router) {
		this.clearModel();
	}

	ngOnInit() {
		$('.ui.form').form({
			on: 'blur',
			inline: true,
			delay: false,
			fields: {
				email: {
					identifier: 'email',
					rules: [
						{
							type: 'empty',
							prompt: 'Por favor insira um e-mail válido'
						}
					]
				},
				password: {
					identifier: 'password',
					rules: [
						{
							type: 'empty',
							prompt: 'Por favor insira uma senha'
						},
						{
							type: 'minLength[6]',
							prompt: 'Sua senha precisa ter pelo menos {ruleValue} caracteres'
						}
					]
				}
			}
		});
	}

	clearModel() {
		this.model = {
			email: null,
			password: null
		};

		this.error = null;
		this.success = null;
	}

	send(form: NgForm) {
		if (form.valid && $("#register_form").form("is valid")) {
			var obj = { ...this.model };
			obj.password = Md5.hashStr(obj.password).toString();

			this.error = null;

			this.apiService
				.post("/login", obj)
				.subscribe(
					(response: any) => {
						response = JSON.parse(response._body);

						if (response.status) {
							this.success = "Usuário logado com sucesso!";

							localStorage.setItem("token", JSON.stringify(response));

							setTimeout(() => {
								this.clearModel();
								this.router.navigate(["/"]);
							}, 600);
						} else {
							this.error = "Houve um erro de comunicação com nosso servidor, por favor tente novamente mais tarde.";
						}
					}
				);
		}
	}
}