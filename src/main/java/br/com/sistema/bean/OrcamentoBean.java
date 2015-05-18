package br.com.sistema.bean;

import java.util.List;

import javax.faces.bean.ManagedBean;
import javax.faces.bean.RequestScoped;

import br.com.sistema.dao.DAO;
import br.com.sistema.modelo.Orcamento;

@ManagedBean
@RequestScoped
public class OrcamentoBean {

	private Orcamento orcamento = new Orcamento();
	private DAO<Orcamento> DAO = new DAO<>(Orcamento.class);

	public Orcamento getOrcamento() {
		return orcamento;
	}

	public void setOrcamento(Orcamento orcamento) {
		this.orcamento = orcamento;
	}

	public List<Orcamento> getOrcamentos() {
		return DAO.listaTodos();
	}

	public void salvar() {
		DAO.adiciona(orcamento);
	}

	public void remover() {

		// DAO.remove(cliente);

	}

}
