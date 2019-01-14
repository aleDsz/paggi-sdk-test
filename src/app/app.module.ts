import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { HttpModule } from '@angular/http';
import { FormsModule } from '@angular/forms';
import { CommonModule } from '@angular/common';
import { NgxMaskModule } from 'ngx-mask';

import { AppComponent } from './app.component';
import { HomeComponent } from './home/home.component';
import { RegisterComponent } from './register/register.component';

import { AppRoutingModule } from './routing.module';
import { LoginComponent } from './login/login.component';

@NgModule({
	declarations: [
		AppComponent,
		HomeComponent,
		RegisterComponent,
		LoginComponent
	],
	imports: [
		BrowserModule,
		HttpModule,
		AppRoutingModule,
		CommonModule,
		FormsModule,
		NgxMaskModule.forRoot()
	],
	providers: [],
	bootstrap: [AppComponent]
})

export class AppModule { }