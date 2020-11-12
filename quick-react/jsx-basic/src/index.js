import React from 'react';
import ReactDOM from 'react-dom';
import './index.css';
import App from './App';
import reportWebVitals from './reportWebVitals';

/* ReactDOM.render(
  <React.Fragment>
    <p>Reactをはじめよう！</p>
    <p>JSXの基本</p>
  </React.Fragment>,
  /*   <React.StrictMode>
      <App />
    </React.StrictMode>, 
  document.getElementById('root')
); */
const name = '山田';

ReactDOM.render(
  <React.Fragment>
    <p>こんにちは、{name}さん!</p>
    <p>JSXの基本</p>
  </React.Fragment>,
  /*   <React.StrictMode>
      <App />
    </React.StrictMode>, 
    */
  document.getElementById('root')
);

// If you want to start measuring performance in your app, pass a function
// to log results (for example: reportWebVitals(console.log))
// or send to an analytics endpoint. Learn more: https://bit.ly/CRA-vitals
reportWebVitals();
