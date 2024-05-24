# Sistema para controle de abastecimento e média de consumo.
## Enunciado no quadro
Cadastrar um ou mais veículos, e, para cada veículo inserir um abastecimento com informações de data, km, do hodômetro, litros abastecidos, valor gasto e se o tanque foi completado ou não. Quando possível (se o tanque foi completado) calcular a média de consumo com base no abastecimento anterior.

## Banco - Controle
### veículos
- id_veiculo
- marca
- modelo
- ano
- placa

### abastecimento
- id_abastecimento
- id_veiculo
- litros
- tanque completo
- hodometro
- data
- media