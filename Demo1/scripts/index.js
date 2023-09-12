/**
 * Подключите этот скрипт
 * убедитесь, что у вас отрисовывается набор карточек вкладов
 */

var DEPOSITS_DATA = [
  {
    name: "Сезонный",
    amount: 100000,
    interestRate: 8,
    timePeriodMonths: 6,
  },
  {
    name: "Годовой",
    amount: 100000,
    interestRate: 8,
    timePeriodMonths: 12,
  },
  {
    name: "Сезонный Плюс",
    amount: 250000,
    interestRate: 9.5,
    timePeriodMonths: 6,
  },
  {
    name: "Стабильный",
    amount: 250000,
    interestRate: 8,
    timePeriodMonths: 24,
  },
  {
    name: "Премиум",
    amount: 500000,
    interestRate: 10,
    timePeriodMonths: 36,
  },
];

/**
 * НЕ ИЗМЕНЯЙТЕ ЭТУ ФУНКЦИЮ
 * createDepositHTML генерирует строку HTML с версткой карточки вклада,
 * эту строку потом можно подставить в любой элемент
 * при помощи <element>.innerHTML = <строка HTML>
 */
function createDepositHTML(depositData) {
  const { name, amount, interestRate, timePeriodMonths } = depositData;

  return `
  <div class="deposit">
    <h2 class="deposit__name">${name}</h2>
    <div class="deposit__info-row">
      <span>Сумма вклада</span> <span>от ${Number(
        amount
      ).toLocaleString()} ₽</span>
    </div>
    <div class="deposit__info-row">
      <span>Ставка</span> <span>${interestRate}%</span>
    </div>
    <div class="deposit__info-row">
      <span>Срок</span> <span>${timePeriodMonths} мес</span>
    </div>
  </div>`;
}

/**
 * НЕ ИЗМЕНЯЙТЕ ЭТУ ФУНКЦИЮ
 * функция renderDeposits отрисовывает набор карточек вкладов в корневом элементе root
 * принимает в качестве параметра массив данных о вкладах deposits,
 */
function renderDeposits(deposits) {
  const root = document.getElementById("deposits-root");
  root.innerHTML = "";

  deposits.forEach(function (deposit) {
    root.innerHTML = root.innerHTML + createDepositHTML(deposit);
  });
}

renderDeposits(DEPOSITS_DATA);
