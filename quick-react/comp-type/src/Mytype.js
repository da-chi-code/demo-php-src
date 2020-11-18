import './App.css';
import PropTypes from 'prop-types';

function Mytype(props) {
  console.log(props.value)
  return (
    <p>コンソールで確認してください</p>
    /*     <div className="App">
          <header className="App-header">
            <img src={ logo } className="App-logo" alt="logo" />
            <p>
              Edit <code>src/App.js</code> and save to reload.
            </p>
            <a
              className="App-link"
              href="https://reactjs.org"
              target="_blank"
              rel="noopener noreferrer"
            >
              Learn React
            </a>
          </header>
        </div> */
  );
}
MyProp.propTypes = {
  prop1: PropTypes.instanceOf(Member),
}
export default Mytype;
