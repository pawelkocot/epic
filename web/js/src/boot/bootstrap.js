import {compose, applyMiddleware, createStore} from 'redux';
import thunkMiddleware from 'redux-thunk';
import {hashHistory} from 'react-router';
import {syncHistoryWithStore} from 'react-router-redux';
import createReducer from './createReducer';

export default (initialState = {}) => {
  const middleware = [thunkMiddleware];
  const enhancers = [];

  if (process.env.NODE_ENV === 'development') {
    const devToolsExtension = window.devToolsExtension;

    if (devToolsExtension) {
      enhancers.push(devToolsExtension());
    }
  }

  const store = createStore(
    createReducer(),
    initialState,
    compose(
      applyMiddleware(...middleware),
      ...enhancers
    )
  );

  const history = syncHistoryWithStore(hashHistory, store);

  return {store, history};
};
