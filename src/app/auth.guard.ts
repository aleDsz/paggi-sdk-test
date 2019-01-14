import { Injectable } from '@angular/core';
import { Router, CanActivate, ActivatedRouteSnapshot, RouterStateSnapshot } from '@angular/router';
import { Observable } from 'rxjs';

@Injectable({
	providedIn: 'root'
})

export class AuthGuard implements CanActivate {
	
	constructor (private router: Router) {

	}

	canActivate(
		next: ActivatedRouteSnapshot,
		state: RouterStateSnapshot): Observable<boolean> | Promise<boolean> | boolean {
		var auth = JSON.parse(localStorage.getItem("token"));

		if (auth) {
			if (auth.status) {
				return true;
			}
		}

		this.router.navigate(["/login"]);
		return false;
	}
}