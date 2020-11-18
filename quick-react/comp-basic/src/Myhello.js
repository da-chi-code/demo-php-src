
import './App.css';
import PropTypes from 'prop-types';

function Myhello(props) {
  return (
    <div>
      こんにちは、{props.name }さん！
    </div>
    /* <div className="App">
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
  )
}
Myhello.propTypes = { name: PropTypes.string.isRequired };

export default Myhello;
