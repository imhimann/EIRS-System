from datetime import datetime

ReportList = []

class Report:
    
    def __init__(self, incident, time, location, description, status):
        self.incident = incident
        self.time = time
        self.location = location
        self.description = description
        self.status= status
        #self.account = account
    
    def printActiveIncident(self):
        
        pass
    
    def searchIncident(self):
        
        pass
        
        

def displayMenu():
    print ("1: Report Incident")
    print ("2: View incidents")
    print ("3: Emergency Contact")
    print ("4: Update Report")
    print ("5: Exit Menu")
    
def inputReport(ReportList):
    incident = input("Please input the type of incident: ")
    
    now = datetime.now()
    time = now.strftime("%d/%m/%Y %H:%M:%S") #dd/mm/yy H:M:S
    
    location = input("Please input location: ")
    
    description = input("Please enter description for the incident: ")
    
    status = "active"
    #account = 
    
    ReportList.append(Report(incident, time, location, description, status))
    return ReportList
    
    
def contactList():
    print ("1: Ambulance 991")
    print ("2: Police 993")
    print ("3: Fire Fighter 995")
    print ("4: Search and Rescue 998")
    print ("5: Exit Menu")
    
    input("select a nuumber: ")
    print("calling...")
    
    
def viewMenu():
    print ("1: View latest incident")
    print ("2: View on-going report")
    print ("3: View specific incident")
    print ("4: View regional incident ")
    print ("5: Exit ")

    







select = 0 
while select != 5:
    
    displayMenu()
    select = int(input("select a number: "))

    if select == 1:
        ReportList = inputReport(ReportList)
        print (ReportList[-1].incident, " reported")
        print ("Incident reported at ", ReportList[-1].time )
        
    elif select == 2:
        viewMenu()
        print ("view")
        
    elif select == 3:
        contactList()
        
    elif select == 4:
        print("update")
    
    else:
        print ("Exit")

