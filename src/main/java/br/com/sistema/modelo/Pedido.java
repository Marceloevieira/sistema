package br.com.sistema.modelo;

import java.util.Calendar;
import java.util.List;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.ManyToOne;
import javax.persistence.OneToMany;
import javax.persistence.Temporal;
import javax.persistence.TemporalType;
import javax.validation.constraints.Max;

@Entity
public class Pedido {
	@Id
	@GeneratedValue(strategy = GenerationType.IDENTITY)
	private Integer id;
	
	private String descricao;
	
	@Max(value = 50)
	private String veiculo_modelo;
	
	@Column(length = 8)
	private String placa;
	
	@Temporal(TemporalType.DATE)
	private Calendar data_pedido;
	
	@ManyToOne
	private Cliente cliente;
	
	@OneToMany(mappedBy = "pedido")
	private List<Orcamento> orcamento;

	public Integer getId() {
		return id;
	}

	public void setId(Integer id) {
		this.id = id;
	}

	public String getDescricao() {
		return descricao;
	}

	public void setDescricao(String descricao) {
		this.descricao = descricao;
	}

	public String getVeiculo_modelo() {
		return veiculo_modelo;
	}

	public void setVeiculo_modelo(String veiculo_modelo) {
		this.veiculo_modelo = veiculo_modelo;
	}

	public String getPlaca() {
		return placa;
	}

	public void setPlaca(String placa) {
		this.placa = placa;
	}

	public Calendar getData_pedido() {
		return data_pedido;
	}

	public void setData_pedido(Calendar data_pedido) {
		this.data_pedido = data_pedido;
	}

	public Cliente getCliente() {
		return cliente;
	}

	public void setCliente(Cliente cliente) {
		this.cliente = cliente;
	}

	public List<Orcamento> getOrcamento() {
		return orcamento;
	}

}
