import {combineReducers} from 'redux';
import eventsReducer from './events/reducer';
import eventGroupsReducer from './eventGroups/reducer';
import reservationsReducer from './reservations/reducer';
import uiReducer from './ui/reducer';

const reducer = combineReducers({
  events: eventsReducer,
  eventGroups: eventGroupsReducer,
  reservations: reservationsReducer,
  ui: uiReducer
});

export default reducer;
