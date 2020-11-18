import React from 'react';
import ReactDOM from 'react-dom';
import './index.css';
import Mytype from './Mytype';
import reportWebVitals from './reportWebVitals';
import Mytype, { Member } from './Mytype';

ReactDOM.render(
  <div>
    <Mytype value='山田' />
    <Mytype value={ '鈴木' } />
    <Mytype value={ 108 } />
    <Mytype value={ true } />
    <Mytype value={ 'うめ', '桃', '桜' } />
    <Mytype value={ { NAME: "山田太郎", AGE: 40 } } />
    <Mytype value={ () => console.log('Hoge') } />
  </div>,
  document.getElementById('root')
);

// If you want to start measuring performance in your app, pass a function
// to log results (for example: reportWebVitals(console.log))
// or send to an analytics endpoint. Learn more: https://bit.ly/CRA-vitals
reportWebVitals();
