import axios from "axios";

export class AnlagenService
{
    static baseUrl = "http://ecor.enesnet.de";
    //static baseUrl = "http://127.0.0.1:8000";
    //static baseUrl = window.location.origin;

    public static getAnlagen(): any
    {
        return axios.get(AnlagenService.baseUrl + "/api/anlagen");
    }

    public static createAnlage(json: string): any
    {
        return axios.post(AnlagenService.baseUrl + "/api/anlage", json);
    }

    public static updateAnlage(id: number, json: string)
    {
        return axios.put(AnlagenService.baseUrl + "/api/anlage/" + id, json)
    }

    public static deleteAnlage(id: number)
    {
        return axios.delete(AnlagenService.baseUrl + "/api/anlage/" + id);
    }

    public static deleteAnlagenFile(id: number, file: string)
    {
        return axios.delete(AnlagenService.baseUrl + "/api/anlage/" + id + "/" + file);
    }
}