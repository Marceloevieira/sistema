package br.com.sistema.dao;

import java.util.List;

import javax.persistence.EntityManager;

import br.com.sistema.modelo.Cliente;

import com.uaihebert.factory.EasyCriteriaFactory;
import com.uaihebert.model.EasyCriteria;

public class ClienteDao {

	public List<Cliente> BuscaPorNome() {
		EntityManager em = new JPAUtil().getEntityManager();
		EasyCriteria<Cliente> easyCriteria = EasyCriteriaFactory
				.createQueryCriteria(em, Cliente.class);

		return easyCriteria.getResultList();

	}

	public Cliente buscaPorNome(String string) {
		// TODO Auto-generated method stub
		return null;
	}
}
