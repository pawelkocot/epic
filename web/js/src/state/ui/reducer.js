import {handleActions} from 'redux-actions';
import {CHANGE_EVENTS_FILTER} from './actions';

const initialState = {
  eventsFilter: {
    eventGroup: null
  }
};

export default handleActions({
  [CHANGE_EVENTS_FILTER]: (state, {payload:eventsFilter}) => ({
    ...state,
    eventsFilter: {
      ...state.eventsFilter,
      ...eventsFilter
    }
  })
}, initialState);
