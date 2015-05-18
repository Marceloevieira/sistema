package br.com.sistema.bean;

import java.util.List;

import javax.faces.bean.ManagedBean;

import br.com.sistema.dao.DAO;
import br.com.sistema.modelo.Produto;

@ManagedBean
public class ItemBean {

	private Produto item = new Produto();
	private DAO<Produto> dao = new DAO<Produto>(Produto.class);

	public Produto getItem() {
		return item;
	}

	public void setItem(Produto item) {
		this.item = item;
	}

	public List<Produto> getItens() {

		return dao.listaTodos();
	}

}
