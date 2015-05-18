package br.com.sistema.dao;

import java.util.List;

import br.com.sistema.modelo.Cliente;

public class TesteEasyCriteria {

	public static void main(String[] args) {
		// TODO Auto-generated method stub

		List<Cliente> clientes = new ClienteDao().BuscaPorNome();

		for (Cliente cliente : clientes) {
			System.out.println(cliente.getId() + " - " + cliente.getNome());
		}
	}
}
