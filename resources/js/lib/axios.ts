// eslint-disable-next-line @typescript-eslint/explicit-module-boundary-types
export function getAxiosErrMessage(err: any): string {
  return err.response.data.message || err.message;
}
