import {combineReducers} from 'redux';
import eventsReducer from './events/reducer';
import eventGroupsReducer from './eventGroups/reducer';
import uiReducer from './ui/reducer';

const reducer = combineReducers({
  events: eventsReducer,
  eventGroups: eventGroupsReducer,
  ui: uiReducer
});

export default reducer;
