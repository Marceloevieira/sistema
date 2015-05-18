package br.com.sistema.bean;

import java.io.IOException;

import javax.faces.application.FacesMessage;
import javax.faces.bean.ManagedBean;
import javax.faces.bean.RequestScoped;
import javax.faces.context.FacesContext;

import br.com.sistema.modelo.Usuario;

@ManagedBean
@RequestScoped
public class Login {

	private Usuario usuario;

	public Login() {
		usuario = new Usuario();
	}

	public Usuario getUsuario() {
		return usuario;
	}

	public Login(Usuario usuario) {
		
		this.usuario = usuario;
	}

	public void setUsuario(Usuario usuario) {
		this.usuario = usuario;
	}
	
	
	public void logar() throws IOException{
		
		System.out.println(usuario.getNome());
		System.out.println(usuario.getSenha());
		FacesContext context = FacesContext.getCurrentInstance();

		context.addMessage(null, new FacesMessage("Successful",
				"conectado!"));
		
		// FacesContext.getCurrentInstance().getExternalContext().redirect("index.jsf");
	}	
	

}
