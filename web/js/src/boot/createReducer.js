import {combineReducers} from 'redux';
import {reducer as formReducer} from 'redux-form';
import {routerReducer} from 'react-router-redux';
import appReducer from '../state/reducer';

export default () => combineReducers({
  app: appReducer,
  form: formReducer,
  routing: routerReducer
});
