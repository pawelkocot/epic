import React from 'react'
import ReactDOM from 'react-dom'
import {Provider} from 'react-redux'
import {Router, Route, IndexRoute} from 'react-router'

import App from '../components/App'
import Second from '../components/Second'
import Home from '../components/Home'

export default (mountNode, store, history) => {
  ReactDOM.render(
    <Provider store={store}>
      <Router history={history}>
        <Route path={'/'} component={App}>
          <IndexRoute component={Home}/>
          <Route path="/second" component={Second}/>
        </Route>
      </Router>
    </Provider>,
    mountNode
  )
}
