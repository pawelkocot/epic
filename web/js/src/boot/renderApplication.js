import React from 'react';
import ReactDOM from 'react-dom';
import {Provider} from 'react-redux';
import Routing from '../components/Routing';

export default (mountNode, store, history) => {
  ReactDOM.render(
    <Provider store={store}>
      <Routing history={history} />
    </Provider>,
    mountNode
  )
};
