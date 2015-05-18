package br.com.sistema.modelo;

import java.util.Calendar;
import java.util.List;

import javax.persistence.Entity;
import javax.persistence.EnumType;
import javax.persistence.Enumerated;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.ManyToOne;
import javax.persistence.OneToMany;
import javax.persistence.Temporal;
import javax.persistence.TemporalType;

@Entity
public class Orcamento {
	@Id
	@GeneratedValue(strategy = GenerationType.IDENTITY)
	private Integer id;
	@Temporal(TemporalType.DATE)
	private Calendar data_pagamento;
	@Temporal(TemporalType.DATE)
	private Calendar data_inclusao;
	@ManyToOne
	private Pedido pedido;
	@Enumerated(EnumType.STRING)
	private Status status;

	@OneToMany(mappedBy = "orcamento")
	private List<Orcamento_item> item;

	public Integer getId() {
		return id;
	}

	public void setId(Integer id) {
		this.id = id;
	}

	public Calendar getData_pagamento() {
		return data_pagamento;
	}

	public void setData_pagamento(Calendar data_pagamento) {
		this.data_pagamento = data_pagamento;
	}

	public Calendar getData_inclusao() {
		return data_inclusao;
	}

	public void setData_inclusao(Calendar data_inclusao) {
		this.data_inclusao = data_inclusao;
	}

	public Pedido getPedido() {
		return pedido;
	}

	public void setPedido(Pedido pedido) {
		this.pedido = pedido;
	}

	public Status getStatus() {
		return status;
	}

	public void setStatus(Status status) {
		this.status = status;
	}

	public List<Orcamento_item> getItem() {
		return item;
	}

}
