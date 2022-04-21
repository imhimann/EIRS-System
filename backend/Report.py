from datetime import datetime

class Report:
    
    def __init__(self, incident, time, location, description, status, reference):
        self.incident = incident
        self.time = time
        self.location = location
        self.description = description
        self.status = status
        self.reference = reference
        #self.account = account
        
        
    

    def updateReport(self, description2, status):
        self.description = (self.description +" \n          Update: " + description2)
        self.status = status
        
    


def printDetails(Report):
    
    print ("Incident: ", Report.incident, "\nTime: ", Report.time, "\nLocation: ", Report.location,
           "\nDescription: ", Report.description, "\nStatus: ", Report.status, "\nReference: ", Report.reference, "\n")
    

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
    reference = len(ReportList) + 1
    
    ReportList.append(Report(incident, time, location, description, status, reference))
    return ReportList
    
def searchByActive(ReportList):
    onGoing = [report for report in ReportList if report.status == "active"]
    
    if onGoing == None:
        print("Active cases not found")
    else:    
        for report in onGoing:
            printDetails(report)
        


def searchReports(ReportList, tag, search):
    
    if tag == 1:  # 1 is by incident name
        fetchReport = [report for report in ReportList if report.incident == search]
    
    elif tag == 2: # 2 is by location
        fetchReport = [report for report in ReportList if report.location == search]
        
    elif tag == 3: # 3 is by status
        fetchReport = [report for report in ReportList if report.status == search]
    
    elif tag == 4: # 4 is by reference (for the authorities)
        fetchReport = [report for report in ReportList if report.reference == search]
        
    else: # 5 or default is search everything
        fetchReport = [report for report in ReportList]
      
        
    # printing the found results  
    
    if not fetchReport: # check if result is empty
        print ("Incident not found\n")
    else:
        for report in fetchReport:
            printDetails (report)
        
        
    


def contactList():
    print ("1: Ambulance 991")
    print ("2: Police 993")
    print ("3: Fire Fighter 995")
    print ("4: Search and Rescue 998")
    print ("5: Exit Menu")
    
    input("select a number: ")
    print("calling...")
    
    
def viewMenu():
    
    tag = 0
    while tag != 5:
    
        print ("Search Menu\n")
        
        print ("1: View specific incidents")
        print ("2: View incidents in location")
        print ("3: View on going incidents")
        print ("4: View all incidents ")
        print ("5: Exit ")
    
        tag = int(input("select a number: "))
        
        if tag == 1:
            search = input("Search Incident: ")
            print ("Searching incidents\n")
            searchReports(ReportList, tag, search)
            print ("Search finished\n")
            
            input("Press Enter to continue...")
            
            
        elif tag == 2:
            search = input ("Search by location: ")
            print ("Searching incidents in ", search, "\n")
            searchReports (ReportList, tag, search)
            print ("Search finished\n") 
            
            input("Press Enter to continue...")
            
            
        elif tag == 3:
            print ("Searching on-going incidents\n")
            searchReports(ReportList, tag, "active")
            print ("Search finished\n")
            
            input("Press Enter to continue...")
            
            
        elif tag == 4:
            print ("Searching on-going incidents\n")
            searchReports(ReportList, 5, None)
            print ("Search finished\n")
            
            input("Press Enter to continue...")
            
        else:
            print ("Exiting\n")



def updateMenu():
    
    
    password = input ("Enter Authority Password to access incident updater: ")
    
    if password == "password":
        ref = int(input("Enter incident reference number: "))
        
        searchReports(ReportList, 4, ref)
        
        answer = input("update this report? y/n: ")
        
        if answer == 'y':
            
            updatedDesc = input ("add in description: ")
            answer2 = input("Change incident status to closed? y/n: ")
            
            if answer2 == 'y':
                ReportList[ref-1].updateReport(updatedDesc, "closed")
                print ("Report updated. case closed")
            else:
                ReportList[ref-1].updateReport(updatedDesc, "active")
                print ("Report updated. Case status remains on-going")
            
            
        else:
            print ("Report not changed\n")
        
        
    else:
        print ("Password incorrect, exiting updater\n")
        
    


ReportList = []



select = 0 
while select != 5:
    
    displayMenu()
    select = int(input("select a number: "))

    if select == 1:
        ReportList = inputReport(ReportList)
        print (ReportList[-1].incident, " reported")
        print ("Incident reported at ", ReportList[-1].time,
               "\nIncident Reference: ", ReportList[-1].reference, "\n" )
        
        input("Press Enter to continue...")
        
    elif select == 2:
        viewMenu()

        
    elif select == 3:
        contactList()
        
        input("Press Enter to continue...")
        
    elif select == 4:
        print("update")
        updateMenu()
        input("Press Enter to continue...")
    
    else:
        print ("Exit")
