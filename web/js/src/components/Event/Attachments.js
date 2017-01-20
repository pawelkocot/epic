import React from 'react';
import {Table, PageHeader} from 'react-bootstrap';
import {getUploadsUrl} from '../../services/config';

export default ({event}) => (
  <div>
    {
      event.attachments.length
        ? <Table striped={true} bordered={true} hover={true}>
          <thead>
          <tr>
            <th>File</th>
          </tr>
          </thead>
          <tbody>
          {event.attachments.map((attachment) => (
            <tr key={attachment.id}>
              <td>
                <a href={getUploadsUrl()+`${event.id}/${attachment.fileName}`} target="_blank">
                  {attachment.fileName}
                  </a>
              </td>
            </tr>
          ))}
          </tbody>
        </Table>
        : <PageHeader>No attachments</PageHeader>
    }
  </div>
)
