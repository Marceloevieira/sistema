package br.com.sistema.bean;

import javax.faces.bean.ManagedBean;
import javax.faces.bean.RequestScoped;

import br.com.sistema.dao.DAO;
import br.com.sistema.modelo.Pedido;

@ManagedBean
@RequestScoped
public class PedidoBean {

	private Pedido pedido = new Pedido();
	private DAO<Pedido> dao = new DAO<>(Pedido.class);

	public Pedido getPedido() {
		return pedido;
	}

	public void setPedido(Pedido pedido) {
		this.pedido = pedido;
	}

	public void salvar() {
		dao.adiciona(pedido);
	}
}
