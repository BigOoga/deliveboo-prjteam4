// <block:setup:1>
const labels = [
    'Gennaio',
    'Febraio',
    'Marzo',
    'Aprile',
    'Maggio',
    'Giugno',
    'Luglio',
    'Agosto',
    'Settembre',
    'Ottobre',
    'Novembre',
    'Dicembre'
  ];
  const data = {
    labels: labels,
    datasets: [{
      label: 'Vendite mensili',
      backgroundColor: 'rgb(5, 29, 161)',
      borderColor: 'rgb(5, 29, 161)',
      data: [0, 2, 0, 4, 5, 10, 18, 5, 2, 20, 30, 45],
    }]
  };
  // </block:setup>
  
  // <block:config:0>
  const config = {
    type: 'line',
    data: data,
    options: {}
  };
  // </block:config>
  
  module.exports = {
    actions: [],
    config: config,
  };
  