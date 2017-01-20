// eslint-disable-next-line
const config = globals || {};

export const getApiUrl = () => config.apiUrl || '/';
export const getAdminPanelUrl = () => config.homepageUrl || '/';
export const getUploadsUrl = () => config.uploadsUrl || '/uploads/';
