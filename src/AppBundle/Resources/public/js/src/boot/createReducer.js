import {combineReducers} from 'redux';
import {reducer as formReducer} from 'redux-form';
import {routerReducer} from 'react-router-redux';
import eventsReducer from '../state/events/reducer';

export default () => combineReducers({
  // app: reducer,
  form: formReducer,
  routing: routerReducer,
  events: eventsReducer
});
