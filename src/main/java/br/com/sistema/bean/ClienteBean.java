package br.com.sistema.bean;

import java.util.ArrayList;
import java.util.Calendar;
import java.util.List;

import javax.faces.application.FacesMessage;
import javax.faces.bean.ManagedBean;
import javax.faces.bean.ViewScoped;
import javax.faces.context.FacesContext;

import br.com.sistema.dao.DAO;
import br.com.sistema.modelo.Cliente;

@ManagedBean
@ViewScoped
public class ClienteBean {

	private Cliente cliente = new Cliente();
	private Cliente novoCliente = new Cliente();
	private DAO<Cliente> DAO = new DAO<Cliente>(Cliente.class);

	public Cliente getCliente() {
		return cliente;
	}

	public void setCliente(Cliente cliente) {
		this.cliente = cliente;
	}

	public Cliente getNovoCliente() {
		return novoCliente;
	}

	public void setNovoCliente(Cliente novoCliente) {
		this.novoCliente = novoCliente;
	}

	public void salvar() {

		novoCliente.setData_inclusao(Calendar.getInstance());
		DAO.adiciona(novoCliente);

		FacesContext context = FacesContext.getCurrentInstance();

		context.addMessage(null, new FacesMessage(novoCliente.getNome(),
				"Adicionado!"));
		novoCliente = new Cliente();
	}

	public List<Cliente> getClientes() {

		return DAO.listaTodos();
	}

	public void atualiza() {
		DAO.atualiza(cliente);
		FacesContext context = FacesContext.getCurrentInstance();

		context.addMessage(null, new FacesMessage(cliente.getNome(),
				"Registro Atualizado!"));
	}

	public void remover() {

		DAO.remove(cliente);

	}

	public List<Cliente> completeText(String query) {

		List<Cliente> listaTodos = DAO.listaTodos();
		List<Cliente> sugestoes = new ArrayList<Cliente>();
		for (Cliente j : listaTodos) {
			if (j.getNome().startsWith(query)) {
				sugestoes.add(j);
			}
		}
		return sugestoes;
	}

	public void onItemSelect() {

		cliente = DAO.buscaPorId(cliente.getId());
	}

}
