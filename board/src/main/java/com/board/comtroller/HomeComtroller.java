package com.board.comtroller;

import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

@RestController
public class HomeComtroller {
@RequestMapping("/")
public String home() {
	return "Hi!";
}
	
}
