import React from 'react';
import {connect} from 'react-redux';
import {loadEvents, changeEventsFilter} from '../../state/actions';
import EventsTable from './EventsTable';
import sortBy from 'lodash/sortBy';

class EventsContainer extends React.Component {
  componentWillMount() {
    if (!this.props.loading && !this.props.loaded) {
      this.props.loadEvents();
    }
  }

  render() {
    const {loading, loaded, failure, errorMessage, events, eventGroups, changeEventsFilter, groupIdFilter} = this.props;

    return (
      <div>
        {loading && <div>Loading...</div>}
        {failure && <div>Loading failure: {errorMessage}</div>}
        {loaded &&
          <div>
            <div>
              Event group:&nbsp;
              <select value={groupIdFilter} onChange={event => changeEventsFilter({groupId: event.target.value})}>
                <option></option>
                {eventGroups.map(eventGroup => <option value={eventGroup.id} key={eventGroup.id}>{eventGroup.name}</option>)}
              </select>
            </div>
            <EventsTable events={events}/>
          </div>
        }
      </div>
    );
  }
}


const mapStateToProps = state => {
  const groupIdFilter = state.app.ui.eventsFilter.groupId;

  const events = sortBy(state.app.events.events, event => event.id).reverse();
  let eventGroups = events.reduce((groups, event) => {
    if (!groups.find(group => group.id === event.groupId)) {
      groups.push({
        id: event.groupId,
        name: event.groupName
      })
    }

    return groups;
  }, []);

  return {
    ...state.app.events,
    events: events.filter(event => groupIdFilter ? event.groupId == groupIdFilter : true),
    eventGroups: sortBy(eventGroups, group => group.id).reverse(),
    groupIdFilter
  };
};

const mapDispatchToProps = {
  loadEvents,
  changeEventsFilter
};

export default connect(mapStateToProps, mapDispatchToProps)(EventsContainer);
