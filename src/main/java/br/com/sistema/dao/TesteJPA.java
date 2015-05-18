package br.com.sistema.dao;

import javax.persistence.EntityManager;

public class TesteJPA {

	public static void main(String[] args) {
		EntityManager em = new JPAUtil().getEntityManager();
		em.getTransaction().begin();
		// Pedido c1 = em.find(Pedido.class, 1);
	//	Orcamento orcamento = new DAO<Orcamento>(Orcamento.class).buscaPorId(1);

		//List<Produto> listaTodos = new DAO<Produto>(Produto.class).listaTodos();

		//orcamento.setItem(listaTodos);
		//new DAO<Orcamento>(Orcamento.class).atualiza(orcamento);

		// System.out.println(c1.getVeiculo_modelo());
	}
}
