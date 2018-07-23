import {AnlagenService} from "../Service/AnlagenService";


export class DialogProvider
{
    private static dhxWins: any;

    static baseUrl = window.location.origin;

    private static createWindow()
    {
        DialogProvider.dhxWins = new dhtmlXWindows();

        let w = Number(650);
        let h = Number(530);
        let x = Number(window.innerWidth / 2 - w / 2);
        let y = Number(window.innerHeight / 2 - h / 2);

        let win = DialogProvider.dhxWins.createWindow("anlagenWindow", x, y, w, h);
        (<any>window).closeWindow = () =>
        {
            win.close();
        };

        return win;
    }

    public static createWindowAnlage(callback: any = null)
    {
        let win = DialogProvider.createWindow();
        win.setText("Neue Anlage");
        win.attachURL(this.baseUrl + "/windowViews/anlagenEdit.html", true, {});
        win.show();

        (<any>window).saveAnlageDB = (json: string) =>
        {
            AnlagenService.createAnlage(json).then(() =>
            {
                if (callback)
                {
                    callback();
                }
            });
            win.close();

        };
    }

    public static updateAnlage(data: any, callback: any = null)
    {
        let win = DialogProvider.createWindow();

        win.setText("Bestehende Anlage bearbeiten");
        win.show();
        win.attachURL(this.baseUrl + "/windowViews/anlagenEdit.html", true, data);

        (<any>window).deleteAnalagenFileDB = (id: number, filename: string) =>
        {
            AnlagenService.deleteAnlagenFile(id, filename).then(() =>
            {
                if (callback)
                {
                    callback();
                }
            });
        };

        (<any>window).updateAnlageDB = (id: number, json: string) =>
        {
            AnlagenService.updateAnlage(id, json).then(() =>
            {
                if (callback)
                {
                    callback();
                }
            });
            win.close();
            console.log("updated");

        };
    }
}