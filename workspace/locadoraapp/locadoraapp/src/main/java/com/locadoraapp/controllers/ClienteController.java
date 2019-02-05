package com.locadoraapp.controllers;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.RequestMapping;

@Controller
public class ClienteController {

	@RequestMapping ("/cadastrarCliente")
	public String form() {
		return "cliente/formCliente";
	}
	
}
