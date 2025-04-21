import axios from 'axios';

const API_URL = 'http://localhost:8080/api/movimentacoes';

const app = document.getElementById('app');

const loadMovimentacoes = async () => {
  const res = await axios.get(API_URL);
  const list = res.data.map(m => `<li>${m.descricao} - ${m.valor}</li>`).join('');
  app.innerHTML = `<ul>${list}</ul>`;
};

loadMovimentacoes();
