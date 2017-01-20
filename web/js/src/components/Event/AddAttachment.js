import React from 'react';
import {connect} from 'react-redux';
import Dropzone from 'react-dropzone';
import {Button} from 'react-bootstrap';
import {uploadAttachment} from '../../state/actions';

class AddAttachment extends React.Component {
  onDrop(acceptedFiles) {
    const {eventId, uploadAttachment} = this.props;

    if (acceptedFiles[0]) {
      uploadAttachment(eventId, acceptedFiles[0]);
    }
  }

  render () {
    return (
      <div>
        <Dropzone onDrop={this.onDrop.bind(this)} className={'btn-toolbar'} multiple={false}>
          <Button>Add attachment</Button>
        </Dropzone>
      </div>
    );
  }
}

export default connect(null, {uploadAttachment})(AddAttachment);
