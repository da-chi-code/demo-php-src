import React from 'react';
import ReactDOM from 'react-dom';
import CounterContext from './contexts/counter'
import Counter from './components/counter'

class App extends React.Component {
  constructor(props) {
    super(props)

    this.increment = this.increment.bind(this)
    this.decrement = this.decrement.bind(this)

    this.state = {
      count: 0,
      increment: this.increment,
      decrement: this.decrement

    }
  }
  increment() {
    this.setState({ count: this.state.count + 1 })
  }
  decrement() {
    this.setState({ count: this.state.count - 1 })
  }
  render() {
    return (
      <CounterContext.Provider value={this.state}>
        <Counter />
      </CounterContext.Provider>
    )
  }
}

ReactDOM.render(<App />, document.getElementById('root'));

        // If you want to start measuring performance in your app, pass a function
        // to log results (for example: reportWebVitals(console.log))
        // or send to an analytics endpoint. Learn more: https://bit.ly/CRA-vitals
